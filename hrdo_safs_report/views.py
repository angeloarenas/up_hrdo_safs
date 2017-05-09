# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render
from django.http import HttpResponse, JsonResponse
from .models import *
from django.db import connection
# Create your views here.


def test(request):
    n = request.GET.get('n', '')

    # TODO: Queries could be constant strings in separate file
    query = None
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
        query = None

    elif n == '10':
        query = 'SELECT leavetype, rsostatus, COUNT(id) AS count ' \
                'FROM transactions ' \
                'GROUP BY leavetype, rsostatus;'

    if query:
        with connection.cursor() as c:
            c.execute(query)
            output = build_dict(str(n)+'_most_common', c)
        return JsonResponse(output)

    else:
        return HttpResponse("No output")


def build_dict(querytype, cursor):
    data = dict()
    data['query'] = querytype
    data['cols'] = [col[0] for col in cursor.description]
    data['rows'] = [row for row in cursor.fetchall()]
    return data
