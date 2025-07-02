//   +=====================================================+
//   |                WRITE YOUR CODE HERE                 |
//   | Description:                                        |
//   | - This function finds the length of the longest     |
//   |   consecutive sequence of integers in the given     |
//   |   array.                                            |
//   |                                                     |
//   | Return type: number                                 |
//   | - Returns the length of the longest consecutive     |
//   |   sequence.                                         |
//   | - Returns 0 if the array is empty.                  |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use a Set to track unique numbers.        |
//   | - The function iterates through each unique number  |
//   |   and finds streaks of consecutive numbers.         |
//   +=====================================================+

function longestConsecutiveSequence__V1(arr) {
	let count = 0;
	let before = 0;
	let aux = 0;
	const sequences = {};
	arr = arr.sort();
	for (const n of arr) {
		if (sequences[aux] && before + 1 === n) {
			sequences[aux].push(n);
		} else {
			aux++;
			sequences[aux] = [];
			sequences[aux].push(n);
		}

		const total = sequences[aux].length;
		if (total > 1 && total > count) {
			count = total;
		}

		before = n;
	}
	return count;
}

function longestConsecutiveSequence(arr) {
	if (arr.length === 0) return 0;

	let count = 1;
	let before = 0;
	let temp = 0;

	arr = arr.sort();
	for (const n of arr) {
		if (before + 1 === n) {
			temp++;
		} else {
			temp = 1;
		}

		if (temp > 1 && temp > count) {
			count = temp;
		}

		before = n;
	}
	return count;
}

// -------------------
// No Consecutive Sequence
// -------------------
console.log('No Consecutive Sequence:');
console.log('Input: [1, 3, 5]');
console.log('Output: ', longestConsecutiveSequence([1, 3, 5]));
console.log('---------------');

// -------------------
// Single Element
// -------------------
console.log('Single Element:');
console.log('Input: [1]');
console.log('Output: ', longestConsecutiveSequence([1]));
console.log('---------------');

// -------------------
// Consecutive Sequence
// -------------------
console.log('Consecutive Sequence:');
console.log('Input: [1, 2, 3, 4, 5]');
console.log('Output: ', longestConsecutiveSequence([1, 2, 3, 4, 5]));
console.log('---------------');

// -------------------
// Unordered Input
// -------------------
console.log('Unordered Input:');
console.log('Input: [5, 2, 3, 1, 4]');
console.log('Output: ', longestConsecutiveSequence([5, 2, 3, 1, 4]));
console.log('---------------');

// -------------------
// Empty Array
// -------------------
console.log('Empty Array:');
console.log('Input: []');
console.log('Output: ', longestConsecutiveSequence([]));
console.log('---------------');

// -------------------
// Multiple Sequences
// -------------------
console.log('Multiple Sequences:');
console.log('Input: [1, 2, 3, 10, 11, 12]');
console.log('Output: ', longestConsecutiveSequence([1, 2, 3, 10, 11, 12]));
console.log('---------------');
