function containsNumbers(str) {
  // return /[0-9]/.test(str);
  return /a/.test(str);
}

console.log(containsNumbers('hello123')); // true
console.log(containsNumbers('javascript')); // false
console.log(containsNumbers('3 apples')); // true