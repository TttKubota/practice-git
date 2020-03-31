#!/bin/bash
/bin/grep function *.php | sed -E -e 's/function *(.*)\(.*$/\1/' | \
  sed -E -e 's/(.*): (.*)/echo \1; grep -nH \2 \1 | grep -v function/'

