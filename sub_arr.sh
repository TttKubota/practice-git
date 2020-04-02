#!/bin/bash
for f in `ls ./npz/subject_*.php`
do
  ls $f ; echo '======================='
  sed -n -E -e '/\$ext_sub = array\(Ssss/,/\]\);$/p' $f
done

