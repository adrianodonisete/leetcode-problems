//   +=====================================================+
//   |                WRITE YOUR CODE HERE                 |
//   | Description:                                        |
//   | - This function removes duplicate items from a list.|
//   |                                                     |
//   | Return type: Array                                  |
//   | - Returns a new array with all unique elements.     |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use a Set to remove duplicates.           |
//   | - The Array.from() method can convert a Set back to |
//   |   an array.                                         |
//   +=====================================================+

function removeDuplicates(arr) {
	const obj = new Map();
	for (const item of arr) {
		obj.set(item, true);
	}
	return Array.from(obj.keys());
}

// ---------------
// No Duplicates
// ---------------
console.log('No Duplicates:');
console.log('Input: [1, 2, 3]');
console.log('Output: ', removeDuplicates([1, 2, 3]));
console.log('---------------');

// ---------------
// With Duplicates
// ---------------
console.log('With Duplicates:');
console.log('Input: [1, 2, 2, 3, 3, 3]');
console.log('Output: ', removeDuplicates([1, 2, 2, 3, 3, 3]));
console.log('---------------');

// ---------------
// Mixed Types
// ---------------
console.log('Mixed Types:');
console.log('Input: [1, "1", true, "true"]');
console.log('Output: ', removeDuplicates([1, '1', true, 'true']));
console.log('---------------');

// ---------------
// Empty Array
// ---------------
console.log('Empty Array:');
console.log('Input: []');
console.log('Output: ', removeDuplicates([]));
console.log('---------------');

// ---------------
// Single Element
// ---------------
console.log('Single Element:');
console.log('Input: [1]');
console.log('Output: ', removeDuplicates([1]));
console.log('---------------');
