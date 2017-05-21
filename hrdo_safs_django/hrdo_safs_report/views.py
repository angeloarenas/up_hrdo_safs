# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render
from django.http import HttpResponse, JsonResponse
from django.db import connection
from django.contrib import messages
from django.template.loader import render_to_string
# Create your views here.


def query(request):
    query = None
    query_type = None

    n = request.GET.get('n', '')
    q = request.GET.get('q', '')

    if n:
        query_type = str(n)+'_most_common'
        # TODO: Queries could be constant strings in separate file
        if n == '1':
            query = 'SELECT leavetype, YEAR(applicationdate) AS applicationyear, COUNT(id) AS count ' \
                    'FROM transactions ' \
                    'GROUP BY leavetype, applicationyear;'
        elif n == '2':
            query = 'SELECT leavetype, gender, COUNT(DISTINCT employeenumber) AS count ' \
                    'FROM transactions JOIN employees USING(employeenumber) ' \
                    'GROUP BY leavetype, gender;'
        elif n == '3':
            query = 'SELECT leavetype, originalassignment, COUNT(DISTINCT employeenumber) AS count ' \
                    'FROM transactions JOIN employees USING(employeenumber) ' \
                    'GROUP BY leavetype, originalassignment;'
        elif n == '4':
            query = 'SELECT leavetype, localabroad, COUNT(id) AS count ' \
                    'FROM transactions ' \
                    'GROUP BY leavetype, localabroad;'
        elif n == '5':
            query = None
        elif n == '6.1':
            query = 'SELECT leavetype, unit, COUNT(DISTINCT employeenumber) AS count ' \
                    'FROM transactions JOIN employees USING(employeenumber) ' \
                    'GROUP BY leavetype, unit;'
        elif n == '6.2':
            query = 'SELECT leavetype, department, COUNT(DISTINCT employeenumber) AS count ' \
                    'FROM transactions JOIN employees USING(employeenumber) ' \
                    'GROUP BY leavetype, department;'
        elif n == '7':
            query = 'SELECT leavetype, employeetype, COUNT(DISTINCT employeenumber) AS count ' \
                    'FROM transactions JOIN employees USING(employeenumber) ' \
                    'GROUP BY leavetype, employeetype;'
        elif n == '8':
            query = 'SELECT leavetype, TIMESTAMPDIFF(YEAR,birthdate,CURDATE()) AS age, ' \
                    'COUNT(DISTINCT employeenumber) AS count ' \
                    'FROM transactions JOIN employees USING(employeenumber) ' \
                    'GROUP BY leavetype, age;'
        elif n == '9':
            query = 'SELECT' # Test for invalid query
        elif n == '10':
            query = 'SELECT leavetype, rsostatus, COUNT(id) AS count ' \
                    'FROM transactions ' \
                    'GROUP BY leavetype, rsostatus;'
    elif q:
        query_type = 'custom'
        query = q

    output = dict()

    if not query:
        messages.error(request, "Empty query")
    else:
        with connection.cursor() as c:
            try:
                c.execute(query)
                output = build_dict(query_type, c)
                messages.success(request, "Query success")
            except:
                messages.error(request, "Invalid query")

    msg = render_to_string('messages.html', request=request)
    output['msg'] = msg
    return JsonResponse(output)


def page(request):
    notifs_query = """SELECT employeenumber, firstname, lastname, primaryemail, enddate, reportforduty, \

                      (CASE 
                      WHEN DATEDIFF(enddate, NOW())<=0 THEN 'Leave ended'
                      ELSE 'Leave ongoing' 
                      END) AS status,


                      (CASE 
                      WHEN DATEDIFF(enddate, NOW())<=30 AND DATEDIFF(enddate, NOW())>0 
                            THEN CONCAT('Reminder: Your leave is about to end in ', DATEDIFF(enddate, NOW()), ' days')
                      WHEN DATEDIFF(enddate, NOW())<=0 
                            THEN CONCAT('Reminder: Your leave has ended. You are expected to report back on duty by ', reportforduty)
                      END) AS message

                      FROM transactions JOIN employees USING(employeenumber) WHERE DATEDIFF(enddate, NOW()) < 30"""
    with connection.cursor() as c:
        output = dict()
        try:
            c.execute(notifs_query)
            output = build_dict("notifs", c)
        except:
            pass
    context = {
        'notifications': output
    }

    return render(request, 'main.html', context)

def build_dict(query_type, cursor):
    data = dict()
    data['query_type'] = query_type
    data['cols'] = [col[0] for col in cursor.description]
    data['rows'] = [row for row in cursor.fetchall()]
    return data
