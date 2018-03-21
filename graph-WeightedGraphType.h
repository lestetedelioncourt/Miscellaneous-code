#ifndef WEIGHTEDGRAPHTYPE_H
#define WEIGHTEDGRAPHTYPE_H
#include <iostream>
#include <iomanip>
#include "Abstractgraph.h"

using namespace std;

class weightedGraphType : public graphType {
public:
	void createWeightedGraph();
	void shortestPath(int);
	void printShortestDistance(int);
	weightedGraphType(int size = 0);
	~weightedGraphType();
protected:
	double **weights;
	double *smallestWeight;
};

void weightedGraphType::shortestPath(int vertex) {
	for (int i = 0; i < gSize; i++) {
		smallestWeight[i] = weights[vertex][i]; //store weights at vertex into smalles weight container
	}
	bool *weightFound;
	weightFound = new bool[gSize];
	for (int i = 0; i < gSize; i++) {
		weightFound[i] = false;
	}
	weightFound[vertex] = true;
	smallestWeight[vertex] = 0;
	for (int i = 0; i < gSize; i++) {
		double minWeight = 1000000.0;
		int v;
		for (int i = 0; i < gSize; i++) { 
			if (!weightFound[i]) {
				if (smallestWeight[i] < minWeight) {
					v = i;
					minWeight = smallestWeight[v];
				}
			}
		}
		weightFound[v] = true;
		for (int i = 0; i < gSize; i++) {
			if (!weightFound[i]) {
				if (minWeight + weights[v][i] < smallestWeight[i]) {
					smallestWeight[i] = minWeight + weights[v][i];
				}
			}
		}
	}
}

void weightedGraphType::printShortestDistance(int vertex) {
	cout << "Source vertex: " << vertex << endl;
	cout << "Shortest distance from source to each vertex" << endl;
	cout << "Vertex     Shortest Distance\n";
	for (int i = 0; i < gSize; i++) {
		cout << setw(4) << i << setw(12) << smallestWeight[i] << endl;
	}
	cout << endl;
}

weightedGraphType::weightedGraphType(int size) : graphType(size) {
	weights = new double*[size];
	for (int i = 0; i < size; i++) {
		weights[i] = new double[size];
	}
	smallestWeight = new double[size];
}

weightedGraphType::~weightedGraphType() {
	for (int i = 0; i < gSize; i++) {
		delete[] weights[i];
	}
	delete[] weights;
	delete smallestWeight;
}

void weightedGraphType::createWeightedGraph() {
	graphType::createGraph();
}

#endif