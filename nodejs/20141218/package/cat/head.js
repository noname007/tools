var someuser = {
	name: 'byvoid',
	func: function () {
		console.log(this.name);
	}
};
// var someuser1 = {
// 	name: 'byvoid',
// 	func: function () {
// 		console.log(this.name);
// 	}
// };
var foo = {
	name: 'foobar'
};
// func = someuser.func.bind(foo);
// func(); // 输出 foobar
// func2 = func.bind(someuser);
// func2(); // 输出 foobar

fun4=function(){
	return someuser.func.call(foo)
}
fun4()

fun5= function(){
	return fun4.call(someuser)
}

fun5()

// fun4.call(someuser1)