PWD = $(shell pwd)
#process the condition of the file have exists
default: install
nginx:
	echo $(PWD),"11"
	test  -f '$(PWD)/nginx-1.8.1.tar.gz' || wget http://nginx.org/download/nginx-1.8.1.tar.gz 
	test  -f '$(PWD)/nginx-1.8.1.tar.gz' && (test -d '$(PWD)/nginx-1.8.1'   || tar -zxvf nginx-1.8.1.tar.gz)
rtmp-mod:
	test -f '$(PWD)/master.zip' || wget https://github.com/noname007/nginx-rtmp-module/archive/master.zip
	test -f '$(PWD)/master.zip' && (test -d '$(PWD)/nginx-rtmp-module-master' || unzip master.zip )
	
dep:
	sudo apt-get install build-essential libpcre3 libpcre3-dev  libssl-dev

install: nginx rtmp-mod dep
	cd nginx-1.8.1 && ./configure --add-module=../nginx-rtmp-module-master/ --with-debug && make && sudo make install
