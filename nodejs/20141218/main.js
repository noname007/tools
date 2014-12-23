var counter1 = require('./util/counter.js')
var counter2 = require('./util/counter.js')
console.log(counter2.count('df'));
console.log(counter1.count('zd'));
console.log('import proporty');
console.log(counter1.i)
console.log(counter2.i)

console.log('import function');
counter3 = require('./util/fun.js')
counter3.g()