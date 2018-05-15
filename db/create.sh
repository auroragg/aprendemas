#!/bin/sh

if [ "$1" = "travis" ]
then
    psql -U postgres -c "CREATE DATABASE aprendeMas_test;"
    psql -U postgres -c "CREATE USER aprendeMas PASSWORD 'aprendeMas' SUPERUSER;"
else
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists aprendeMas
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists aprendeMas_test
    [ "$1" != "test" ] && sudo -u postgres dropuser --if-exists aprendeMas
    sudo -u postgres psql -c "CREATE USER aprendeMas PASSWORD 'aprendeMas' SUPERUSER;"
    [ "$1" != "test" ] && sudo -u postgres createdb -O aprendeMas aprendeMas
    sudo -u postgres createdb -O aprendeMas aprendeMas_test
    LINE="localhost:5432:*:aprendeMas:aprendeMas"
    FILE=~/.pgpass
    if [ ! -f $FILE ]
    then
        touch $FILE
        chmod 600 $FILE
    fi
    if ! grep -qsF "$LINE" $FILE
    then
        echo "$LINE" >> $FILE
    fi
fi
