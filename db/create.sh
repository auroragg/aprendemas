#!/bin/sh

if [ "$1" = "travis" ]
then
    psql -U postgres -c "CREATE DATABASE aprendemas_test;"
    psql -U postgres -c "CREATE USER aprendemas PASSWORD 'aprendemas' SUPERUSER;"
else
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists aprendemas
    [ "$1" != "test" ] && sudo -u postgres dropdb --if-exists aprendemas_test
    [ "$1" != "test" ] && sudo -u postgres dropuser --if-exists aprendemas
    sudo -u postgres psql -c "CREATE USER aprendemas PASSWORD 'aprendemas' SUPERUSER;"
    [ "$1" != "test" ] && sudo -u postgres createdb -O aprendemas aprendemas
    sudo -u postgres createdb -O aprendemas aprendemas_test
    LINE="localhost:5432:*:aprendemas:aprendemas"
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
