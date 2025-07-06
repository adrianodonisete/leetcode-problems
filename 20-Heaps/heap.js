class Heap {
	#heap = [];

	getHeap() {
		return [...this.#heap];
	}

	#leftChild(i) {
		return 2 * i + 1;
	}

	#rightChild(i) {
		return 2 * i + 2;
	}

	#parent(i) {
		return Math.floor((i - 1) / 2);
	}

	#swap(index1, index2) {
		[this.#heap[index1], this.#heap[index2]] = [this.#heap[index2], this.#heap[index1]];
	}

	#sinkDown(i) {
		let maxIndex = i;
		let size = this.#heap.length;
		while (true) {
			let leftIndex = this.#leftChild(i);
			let rightIndex = this.#rightChild(i);
			if (leftIndex < size && this.#heap[leftIndex] > this.#heap[maxIndex]) {
				maxIndex = leftIndex;
			}
			if (rightIndex < size && this.#heap[rightIndex] > this.#heap[maxIndex]) {
				maxIndex = rightIndex;
			}
			if (maxIndex !== i) {
				this.#swap(i, maxIndex);
				i = maxIndex;
			} else {
				return;
			}
		}
	}

	insert(value) {
		this.#heap.push(value);
		let current = this.#heap.length - 1;

		while (current > 0 && this.#heap[current] > this.#heap[this.#parent(current)]) {
			this.#swap(current, this.#parent(current));
			current = this.#parent(current);
		}
	}

	remove() {
		if (this.#heap.length === 0) return null;
		if (this.#heap.length === 1) return this.#heap.pop();

		const max = this.#heap[0];
		this.#heap[0] = this.#heap.pop();
		this.#sinkDown(0);
		return max;
	}
}

const h = new Heap();
h.insert(95);
h.insert(75);
h.insert(80);
h.insert(55);
h.insert(60);
h.insert(50);
h.insert(65);

console.log(h.getHeap());

h.remove();

console.log(h.getHeap());

h.remove();

console.log(h.getHeap());
