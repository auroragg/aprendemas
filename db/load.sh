#!/bin/sh

BASE_DIR=$(dirname $(readlink -f "$0"))
if [ "$1" != "test" ]
then
    psql -h localhost -U aprendemas -d aprendemas < $BASE_DIR/aprendemas.sql
fi
psql -h localhost -U aprendemas -d aprendemas_test < $BASE_DIR/aprendemas.sql
