#/bin/bash

mkdir data
cd data
echo "rhymix 최신버전 다운로드"
wget https://rhymix.org/files/attach/releases/rhymix-2.1.7.zip
unzip ./*
echo "권한변경"
chown -R 82:82 rhymix
echo "Done"
