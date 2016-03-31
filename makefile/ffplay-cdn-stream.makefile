STREAM_NAME=yangzz
122:
	ffplay  rtmp://192.168.1.122/live/$(STREAM_NAME)  

ljd-180:
	ffplay rtmp://123.57.153.180/live/$(STREAM_NAME)  -loglevel verbose
ks:
	ffplay rtmp://rgbvr.rtmplive.ks-cdn.com/live/$(STREAM_NAME)  
dl:
	ffplay rtmp://dl.live.rgbvr.com/rgbvr/$(STREAM_NAME) 
gs:
	ffplay  rtmp://gs.live.rgbvr.com/rgbvr/$(STREAM_NAME)  

122-nobuf:
	ffplay  -fflags nobuffer   rtmp://192.168.1.122/live/$(STREAM_NAME)  -loglevel verbose

ljd-180-nobuf:
	ffplay  -fflags nobuffer  rtmp://123.57.153.180/live/$(STREAM_NAME)  -loglevel verbose
ks-nobuf:
	ffplay  -fflags nobuffer  rtmp://rgbvr.rtmplive.ks-cdn.com/live/$(STREAM_NAME)  -loglevel verbose
dl-nobuf:
	ffplay  -fflags nobuffer  rtmp://dl.live.rgbvr.com/rgbvr/$(STREAM_NAME)  -loglevel verbose
gs-nobuf:
	ffplay   -fflags nobuffer  rtmp://gs.live.rgbvr.com/rgbvr/$(STREAM_NAME)  -loglevel verbose
