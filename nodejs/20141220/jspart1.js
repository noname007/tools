// // flight ={
// // 	number:{}
// // }
// console.log('prototype');
// flight_proto ={
// 	'name':'dfdfd',
// 	age:13,
// 	fun:function(){console.log('age:'+this.age+';name:'+this.name);}
// }

// function flight()
// {

// }

// flight.fun2=function(){console.log('age'+this.age);}
// console.log(flight)

// flight.prototype = flight_proto
// console.log(flight.prototype)

// flight.prototype.good='dfd'
// console.log(flight.prototype)

// var f = new flight
// f.name='1'

// console.log(typeof f.good)
// console.log(f.good)
// // 
// console.log(f)

// // console.log(Function.prototype);
// console.log(typeof Function.prototype);
// console.log(typeof Function.prototype.prototype);
// // console.log(Object.prototype);
// // console.log(Object);
// // return 

// var fun4 =function add(a,b){return a+b}
// console.log(fun4);
// console.log(fun4.prototype);



// console.log('funcition forin');
// for (var key in fun4)
// {
// 	console.log(key);
// }  


// (function (a,b){
// 	console.log(a+b);
// })(1,2);

// (function (a,b){
// 	console.log(a+b);
// })(2,3,1);
// (function (a,b){
// 	console.log(a+b);
// })(1)

// console.log('funcition forin end');


// console.log('calculate')
// var myobj = {
// 	age:0
// }
// myobj.growup=function(){
// 	this.age +=1
// 	// console.log(this.age);
// 	var say=function(){
// 		console.log('i\'m '+this.age)
// 	}
// 	// .bind(this)
// 	// .bind(myobj)
// 	say()
// }
// myobj.growup()
// console.log('age:'+myobj.age)
// console.log('calculate end');


// console.log('\n\n\nforin + hasOwnProperty')
// for (var key in f)
// {
// 	console.log(key)
// 	if(f.hasOwnProperty(key))
// 		console.log(f[key])
// }

// quick sort()

// Array.prototype.push=function(ele){
// 	this.push(ele)
// 	return this
// }
name=1;
// console.log(this)
var person=function(d,age){
    var name= d;
	var t =function()
	{
		return {
			// name:'dfad',
			say:function(){
				console.log(name)
				return this
			},
			set:function(d){
				name = d
				return this
			}
		}
	}

	return t()
}
// console.log(name)
console.log(person('12121',12).say().set('232').say())
// console.log(name)













