#!/bin/sh

BASE_DIR=$(dirname $(readlink -f "$0"))
if [ "$1" != "test" ]
then
    psql -h localhost -U aprendeMas -d aprendeMas < $BASE_DIR/aprendeMas.sql
fi
psql -h localhost -U aprendeMas -d aprendeMas_test < $BASE_DIR/aprendeMas.sql
