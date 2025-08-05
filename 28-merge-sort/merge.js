// WRITE THE MERGE FUNCTION HERE //
//                               //
//                               //
//                               //
//                               //
///////////////////////////////////
function merge(arr1, arr2) {
	let combined = [];
	let i = 0;
	let j = 0;
	while (i < arr1.length && j < arr2.length) {
		if (arr1[i] < arr2[j]) {
			combined.push(arr1[i]);
			i++;
		} else {
			combined.push(arr2[j]);
			j++;
		}
	}
	while (i < arr1.length) {
		combined.push(arr1[i]);
		i++;
	}
	while (j < arr2.length) {
		combined.push(arr2[j]);
		j++;
	}
	return combined;
}

function test() {
	let myArray1 = [1, 3, 7, 8];
	let myArray2 = [2, 4, 5, 6];
	console.log(merge(myArray1, myArray2));
}

test();

/*
    EXPECTED OUTPUT:
    ----------------
    [ 1, 2, 3, 4, 5, 6, 7, 8 ]

*/
