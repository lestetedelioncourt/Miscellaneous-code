#ifndef UNORDEREDLINKEDLIST_H
#define UNORDEREDLINKEDLIST_H

#include <iostream>
#include "LinkedListClass.h"

using namespace std;

template <typename Type> class unorderedLinkedList : public linkedListType<Type> {
public:
	bool search(const Type&) const;
	void insertFirst(const Type&);
	void insertLast(const Type&);
	void deleteNode(const Type&);
};


/*template <typename Type> bool unorderedLinkedList<Type>::operator==(const unorderedLinkedList<Type> &rhs) {
node<Type> *current = first, *rhscurrent = rhs.first;
while ((current != NULL) && (rhscurrent != NULL)) {
if (current->info != rhscurrent->info) {
return false;
}
else {
current = current->link;
rhscurrent = rhscurrent->link;
}
}
if ((current == NULL) && (rhscurrent == NULL)) {
return true;
}
else {
return false;
}
}

template <typename Type> bool unorderedLinkedList<Type>::operator!=(const unorderedLinkedList<Type> &rhs) {
node<Type> *current, *rhscurrent;
current = new node<Type>;
rhscurrent = new node<Type>;
current = first;
rhscurrent = rhs.first;
while ((current != NULL) && (rhscurrent != NULL)) {
if (current->info != rhscurrent->info) {
return true;
}
else {
current = current->link;
rhscurrent = rhscurrent->link;
}
}
if ((current == NULL) && (rhscurrent == NULL)) {
return false;
}
else {
return true;
}
}*/

template <typename Type> bool unorderedLinkedList<Type>::search(const Type& searchItem) const {
	node<Type> *current;
	bool found = false;
	current = first;
	while ((current != NULL) && (!found)) {
		if (current->info == searchItem) {
			found = true;
		}
		else {
			current = current->link;
		}
	}
	return found;
}

template <typename Type> void unorderedLinkedList<Type>::insertFirst(const Type &item) {
	node<Type> *newNode;
	newNode = new node<Type>;
	newNode->info = item;
	newNode->link = first;
	first = newNode;
	count++;
	if (last == NULL) {
		last = newNode;
	}
}

template <typename Type> void unorderedLinkedList<Type>::insertLast(const Type& item) {
	node<Type> *newNode;
	newNode = new node<Type>;
	newNode->info = item;
	newNode->link = NULL;
	if (first == NULL) {
		first = newNode;
		last = newNode;
		count++;
	}
	else {
		last->link = newNode;
		last = newNode;
	}
}

template <typename Type> void unorderedLinkedList<Type>::deleteNode(const Type&item) {
	node<Type> *current, *trailCurrent;
	bool found;
	if (first == NULL) {
		cout << "The list is empty\n";
	}
	else {
		if (first->info == item) {
			current = first;
			first = first->link;
			count--;
			if (first == NULL) {
				last = NULL;
			}
			delete current;
		}
		else {
			found = false;
			trailCurrent = first;
			current = first->link;
			while ((current != NULL) && (!found)) {
				if (current->info != item) {
					trailCurrent = current;
					current = current->link;
				}
				else {
					found = true;
				}
			}
			if (found) {
				trailCurrent->link = current->link;
				count--;
				if (last == current) {
					last = trailCurrent;
				}
				delete current;
			}
			else {
				cout << "Item not found in list\n";
			}
		}
	}
}

#endif