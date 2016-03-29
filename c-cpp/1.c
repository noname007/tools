#include "stdio.h"

#define P(dsc) 			\
	{							\
		int  last = 1;			\
		int current  = 2;	\
		PP(dsc) \
	}	


#define PP(dsc)\
	{						\
		printf("%d\n", last);\
		printf("%d\n", current);							\
	}

#define Log() { \
	printf("	====>>>>%s,%d\n",__FILE__,__LINE__);			\
}

enum 
{
	AV_CODEC,
	AV_AUDIO
};

int main(int argc, char const *argv[])
{
	printf("%s\n", "hello world");
	P("he")
	// // last = 2;
	// PP("he")
	Log()
	Log()
	Log()
	Log()
	Log()
	Log()
	return 0;
}