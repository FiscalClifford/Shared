import time
import sys
from hashlib import md5, sha256, sha1, sha384, sha512

start_time = time.time()

f1 = []
f2 = []


arg_d = ""
arg_i = ""
arg_o1 = ""
arg_o2 = ""


for j in range(len(sys.argv)):
    if (sys.argv[j])[0] == '-':
        if (sys.argv[j])[1] == 'd':
            arg_d = sys.argv[j + 1]
        elif (sys.argv[j])[1] == 'i':
            arg_i = sys.argv[j + 1]
        elif (sys.argv[j])[1] == 'o':
            arg_o1 = sys.argv[j + 1]
            arg_o2 = sys.argv[j + 2]

for i in range(4000000):
    f1.append(0)
    f2.append(0)

def index(hash):
    place = int(hash.hexdigest(), 16)
    place = place % 4000000
    f1[place] = 1
    f2[place] = 1
    
def inputhash(hash):
    place = int(hash.hexdigest(), 16)
    place = place % 4000000
    return place






with open(arg_d) as f:

    count = 0
    for line in f:
        line.strip('\n')
        hash1 = sha256(line)
        hash2 = md5(line)
        hash3 = sha1(line)
        hash4 = sha384(line)
        hash5 = sha512(line)

        #Index dictionary
        index(hash1)
        index(hash2)
        index(hash3)
        index(hash4)
        index(hash5)

    print("Indexed after %s seconds " % (time.time() - start_time))

    
#Comparison

with open(arg_i) as f:
    next(f)                        
    for line in f:
        line.strip('\n')
        hash1 = sha256(line)
        hash2 = md5(line)
        hash3 = sha1(line)
        hash4 = sha384(line)
        hash5 = sha512(line)

        place1 = inputhash(hash1)
        place2 = inputhash(hash2)
        place3 = inputhash(hash3)

        #FIRST FILTER
        out = open(arg_o1, 'a')

        if f1[place1] == 1 and f1[place2] == 1 and f1[place3] == 1:
            out.write('maybe\n')
        else:
            out.write('no\n')
        out.close()

        place4 = inputhash(hash4)
        place5 = inputhash(hash5)

        #SECOND FILTER
        out = open(arg_o2, 'a')

        if f2[place1] == 1 and f2[place2] == 1 and f2[place3] == 1 and f2[place4] == 1 and f2[place5] == 1:
            out.write('maybe\n')
        else:
            out.write('no\n')
        out.close()

print("Compared after %s seconds" % (time.time() - start_time))