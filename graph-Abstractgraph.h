#ifndef GRAPHTYPE_H
#define GRAPHTYPE_H
#include <iostream>
#include <fstream>
#include <deque>
#include "unorderedlinkedlist.h"
#include "linkedListIterator.h"

using namespace std;

class graphType {
public:
	bool isEmpty() const;
	void createGraph();
	void clearGraph();
	void printGraph() const;
	void depthFirstTraversal();
	void dftAtVertex(int);
	void breadthFirstTraversal();
	graphType(int size = 0);
	~graphType();
protected:
	int maxSize;
	int gSize;
	unorderedLinkedList<int> *graph; //linked list of pointers, 2d array effect
private:
	void dft(int, bool[]);
};

graphType::~graphType() {
	clearGraph();
}

bool graphType::isEmpty() const {
	return (gSize == 0);
}

void graphType::createGraph() {
	ifstream infile;
	char fileName[50];
	int index, vertex, adjacentVertex;
	if (gSize != 0) {
		clearGraph();
	}
	cout << "Enter file name: ";
	cin >> fileName;
	cout << endl;
	infile.open(fileName);
	if (!infile) {
		cout << "Cannot open file\n";
		return;
	}
	infile >> gSize;
	for (index = 0; index < gSize; index++) {
		infile >> vertex;
		infile >> adjacentVertex;
		while (adjacentVertex != -999) {
			graph[vertex].insertLast(adjacentVertex);
			infile >> adjacentVertex;
		}
	}
	infile.close();
}

void graphType::clearGraph() {
	for (int index = 0; index < gSize; index++) {
		graph[index].destroyList();
	}
	gSize = 0;
}

void graphType::printGraph() const {
	for (int index = 0; index < gSize; index++) {
		cout << "index " << index << ": ";
		graph[index].print();
		cout << endl;
	}
	cout << endl;
}

graphType::graphType(int size) {
	maxSize = size;
	gSize = 0;
	graph = new unorderedLinkedList<int>[size];
}

void graphType::dft(int i, bool visited[]) { //depth first traversal
	visited[i] = true;
	cout << " " << i << " ";
	linkedListIterator<int> iter;
	for (iter = graph[i].begin(); iter != graph[i].end(); ++iter) {
		int w = *iter;
		if (!visited[w]) {
			dft(w, visited);
		}
	}
}

void graphType::depthFirstTraversal() {
	bool *visited; //pointer to create array to store visited vertices
	visited = new bool[gSize];
	int index;
	for (index = 0; index < gSize; index++)
		visited[index] = false;
	//for vertices not visited, perform depth first traversal
	for (index = 0; index < gSize; index++) {
		if (!visited[index]) {
			dft(index, visited);
		}
	}
	delete[] visited;
}

void graphType::dftAtVertex(int vertex) {
	bool *visited;
	visited = new bool[gSize];
	for (int index = 0; index < gSize; index++) {
		visited[index] = false;
	}
	dft(vertex, visited);
	delete[] visited;
}

void graphType::breadthFirstTraversal() {
	deque<int> queue;
	bool *visited;
	visited = new bool[gSize];
	for (int i = 0; i < gSize; i++) {
		visited[i] = false;
	}
	linkedListIterator<int> iter;
	for (int index = 0; index < gSize; index++) {
		if (!visited[index]) {
			queue.push_front(index);
			visited[index] = true;
			cout << " " << index << " ";
			while (!queue.empty()) {
				int u = queue.front();
				queue.pop_front();
				for (iter = graph[u].begin(); iter != graph[u].end(); ++iter) {
					int w = *iter;
					if (!visited[w]) {
						queue.push_front(w);
						visited[w] = true;
						cout << " " << w << " ";
					}
				}
			}
		}
	}
	delete[] visited;
}

#endif