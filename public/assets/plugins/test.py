def sum_multiples(limit=20):
    l = []
    limit+=1
    for i in xrange(limit):
        if(i%3 == 0 or i%5 == 0):
            l.append(i)
    print(l)


sum_multiples()