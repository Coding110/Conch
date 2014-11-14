
MCXX=g++
SRC_MAIN=main.cpp
SRC_MODAL=task_thread.cpp emfs.cpp db.cpp log.cpp common.cpp
LIB=-lpthread -lmysqlclient
INC=-I /usr/include/mariadb
TARG=emfs_bkg
MFLAGS=

all:
	$(MCXX) $(SRC_MAIN) $(SRC_MODAL) $(LIB) $(MFLAGS) -o $(TARG)

test:
	$(MCXX) test.cpp $(SRC_MODAL) $(INC) $(LIB) $(MFLAGS) -o $@

clean:
	rm *.o
	rm $(TARG)

