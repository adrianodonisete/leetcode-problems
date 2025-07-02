class Graph {
	constructor() {
		this.adjacencyList = {};
	}

	printGraph() {
		if (Object.keys(this.adjacencyList).length !== 0) {
			console.log('{');
			for (const [key, value] of Object.entries(this.adjacencyList)) {
				console.log(' ', `${key}: ${value}`);
			}
			console.log('}');
		} else {
			console.log('{}');
		}
	}

	addVertex(vertex) {
		if (!this.adjacencyList[vertex]) {
			this.adjacencyList[vertex] = [];
			return true;
		}
		return false;
	}

	addEdge(v1, v2) {
		if (this.adjacencyList[v1] && this.adjacencyList[v2]) {
			this.adjacencyList[v1].push(v2);
			this.adjacencyList[v2].push(v1);
			return true;
		}
		return false;
	}

	removeEdge(v1, v2) {
		if (this.adjacencyList[v1] && this.adjacencyList[v2]) {
			this.adjacencyList[v1] = this.adjacencyList[v1].filter(v => v !== v2);
			this.adjacencyList[v2] = this.adjacencyList[v2].filter(v => v !== v1);
			return true;
		}
		return false;
	}

	removeVertex(vertex) {
		if (!this.adjacencyList[vertex]) return undefined;

		while (this.adjacencyList[vertex].length) {
			let temp = this.adjacencyList[vertex].pop();
			this.removeEdge(vertex, temp);
		}
		delete this.adjacencyList[vertex];
		return true;
	}
}

function test() {
	let myGraph = new Graph();
	myGraph.addVertex('A');
	myGraph.addVertex('B');
	myGraph.addVertex('C');
	myGraph.addVertex('D');
	myGraph.addEdge('A', 'B');
	myGraph.addEdge('B', 'C');
	myGraph.addEdge('C', 'D');
	myGraph.addEdge('D', 'A');
	myGraph.printGraph();

	// myGraph.removeEdge('D', 'A');
	myGraph.removeVertex('D');
	myGraph.printGraph();
}

test();

/*
    EXPECTED OUTPUT:
    ----------------
    {}

*/
