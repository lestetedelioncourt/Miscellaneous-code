#include <iostream>
#include "WeightedGraphType.h"

using namespace std;

int main() {
	unorderedLinkedList<int> list1;
	weightedGraphType graph(7);
	graph.createGraph();
	graph.printGraph();
	cout << endl;
	cout << "breadth first :\n";
	graph.breadthFirstTraversal();
	cout << endl;
	graph.depthFirstTraversal();
	cout << endl;
	graph.dftAtVertex(3);
	cout << endl;

	system("PAUSE");
	return 0;
}