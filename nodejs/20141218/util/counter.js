var i =0;
function c(who)
{
	console.log(who);
	// console.log(i);
	return ++i;
}
console.log('import counter');

exports.count = c
exports.i=i
