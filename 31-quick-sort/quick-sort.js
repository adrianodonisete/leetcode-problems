function swap(array, firstIndex, secondIndex) {
	let temp = array[firstIndex];
	array[firstIndex] = array[secondIndex];
	array[secondIndex] = temp;
}

function pivot(arr, pivotIndex = 0, endIndex = arr.length - 1) {
	let swapIndex = pivotIndex;
	for (let i = pivotIndex + 1; i <= endIndex; i++) {
		if (arr[i] < arr[pivotIndex]) {
			swapIndex++;
			swap(arr, swapIndex, i);
		}
	}
	swap(arr, pivotIndex, swapIndex);
	return swapIndex;
}

// WRITE QUICKSORT FUNCTION HERE //
//                               //
//                               //
//                               //
//                               //
///////////////////////////////////
function quickSort(arr, left = 0, right = arr.length - 1) {
	if (left < right) {
		let pivotIndex = pivot(arr, left, right);
		quickSort(arr, left, pivotIndex - 1);
		quickSort(arr, pivotIndex + 1, right);
	}
	return arr;
}

function test() {
	let myArray = [4, 6, 1, 7, 3, 2, 5];
	quickSort(myArray);
	console.log(myArray);
}

test();

/*
    EXPECTED OUTPUT:
    ----------------
    [ 1, 2, 3, 4, 5, 6 ]

*/
