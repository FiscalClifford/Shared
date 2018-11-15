import time
# reader program to help us test for LOOK

# each iteration of testlength has five steps of reading, one step of not reading. Continues for value given
#  to testlength
count = 0
testlength = 5
with open ('file.txt'):
    while(testlength > 0):
        while(count < 5):
            time.sleep(1)
            print("%s file being read" % count)
            count = count + 1
        count = 0
        time.sleep(1)
    testlength = testlength - 1