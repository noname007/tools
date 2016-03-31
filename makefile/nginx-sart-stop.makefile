PWD=$(shell pwd)                                                                                                                                                                             
NGINX=$(PWD)/sbin/nginx
stop:
	sudo $(NGINX) -s stop
	ps aux|grep $(NGINX) 
start:
	sudo $(NGINX)
	ps aux|grep $(NGINX) 
restart: stop start