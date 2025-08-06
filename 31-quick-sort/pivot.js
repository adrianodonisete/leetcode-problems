function swap(array, firstIndex, secondIndex) {
	let temp = array[firstIndex];
	array[firstIndex] = array[secondIndex];
	array[secondIndex] = temp;
}

// WRITE THE PIVOT FUNCTION HERE //
//                               //
//                               //
//                               //
//                               //
///////////////////////////////////
function pivot(arr, pivotIndex = 0, endIndex = arr.length - 1) {
	let swapIndex = pivotIndex;
	for (let i = pivotIndex + 1; i <= endIndex; i++) {
		console.log(arr[i]);

		if (arr[i] < arr[pivotIndex]) {
			swapIndex++;
			swap(arr, swapIndex, i);
		}
	}
	swap(arr, pivotIndex, swapIndex);
	return swapIndex;
}

function test() {
	let myArray = [4, 6, 1, 7, 3, 2, 5];
	pivot(myArray);
	console.log(myArray);
}

test();

/*
    EXPECTED OUTPUT:
    ----------------
    [ 2, 1, 3, 4, 6, 7, 5 ]

*/
