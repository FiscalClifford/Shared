import Threading

mutex = lock()

def processData(data):
    mutex.acquire()
    try:
        print('Do some stuff')
    finally:
        mutex.release()

while True:
    t = Thread(target = processData, args = (some_data,))
    t.start()




#################################
fork = [Lock(),Lock(),Lock(),Lock(), Lock()]



