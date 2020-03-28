#!/bin/sh
n=0
for cs in '8d15df'  '2c27d7' '07da3b' 'e1f9ea' '197b4b' 'd72d3f' 'b3db4a' '9b8ab7' 'a92d58' '94756f' 'e1d37c' '4a7e40' '325472'
do
git checkout $cs numplax.php
mv  numplax.php numplax${n}.php
# php numplax${n}.php
n=`expr $n + 1`
done
exit
 '8d15dfc014b51317e7e1e1356bcfdddf178649d2' \ 
 '2c27d76896eb811a061a5291491b180a36d993a2' \
 '07da3bc3af3dbb55e498b7b5b6b72e775b7ce9a0' \
 'e1f9eae1ceb485e0149699007bf1c5b829c6d455' \
 '197b4b498e09630a53c6520078d5510083a624c9' \
 'd72d3f2333577faa4365aef96fd79a68cf3223ac' \
 'b3db4a9b1642efa65a84a86ec3e311ab82bb9a7c' \
 '9b8ab783f87f07a28b955f1c681c88c2128d2b7f' \
 'a92d58f1aecf04a0fd33a062e2a5aef2d9d26725' \
 '94756f045cba778942fa0ed0c4a086734501f7c7' \
 'e1d37cb90aab84c4f7e0376db7024e5fad9f124a' \
 '4a7e40b97f075f1a73762f2ecccf4343ed0d47f2' \
 '32547200e27b158525b6dfcb0a451f57448d9e3a'

