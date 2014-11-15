
MCXX=g++
SRC_MAIN=main.cpp
SRC_MODAL=base64.cpp task_thread.cpp emfs.cpp db.cpp log.cpp common.cpp imap_message.cpp
LIB=-lpthread -lmysqlclient -letpan
INC=-I /usr/include/mariadb
TARG=emfs_bkg
MFLAGS=

all:
	$(MCXX) $(SRC_MAIN) $(SRC_MODAL) $(INC) $(LIB) $(MFLAGS) -o $(TARG)

test:
	$(MCXX) test.cpp $(SRC_MODAL) $(INC) $(LIB) $(MFLAGS) -o $@

clean:
	rm *.o
	rm $(TARG)

