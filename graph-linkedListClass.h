#ifndef LINKEDLISTTYPE_H
#define LINKEDLISTTYPE_H
#include <iostream>
#include <cassert>
#include "Linkedlistiterator.h"

using namespace std;

template <typename Type> class linkedListType {
public:
	const linkedListType<Type>& operator=(const linkedListType<Type> &rhs);
	bool operator==(const linkedListType<Type> &rhs) {
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
	bool operator!=(const linkedListType<Type> &rhs) {
		node<Type> *current = first, *rhscurrent = rhs.first;
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
	}
	void initializeList(); //initializes list
	bool isEmptyList() const; //returns true if list is empty
	void print() const; //prints list
	int length() const; //returns length of the list
	void destroyList(); //destroys the list
	Type front() const; // returns value at front of list
	Type back() const; //returns value at end of list
	virtual bool search(const Type&) const = 0; //will differ for ordered and nordered lists
	virtual void insertFirst(const Type&) = 0;
	virtual void insertLast(const Type&) = 0;
	virtual void deleteNode(const Type&) = 0;
	linkedListIterator<Type> begin();
	linkedListIterator<Type> end();
	linkedListType(); //default constructor
	linkedListType(const linkedListType<Type>&); //copy constructor
	~linkedListType(); //destructor
protected:
	int count;
	node<Type> *first;
	node<Type> *last;
private:
	void copyList(const linkedListType<Type>&);
};

template <typename Type> void linkedListType<Type>::destroyList() {
	node<Type> *temp;
	while (first != NULL) {
		temp = first;
		first = first->link;
		delete temp;
	}
	first = NULL;
	last = NULL;
	count = 0;
}

template <typename Type> void linkedListType<Type>::copyList(const linkedListType<Type>& rhs) {
	node<Type> *newNode, *current;
	if (first != NULL) {
		destroyList();
	}
	if (rhs.first == NULL) {
		first = NULL;
		last = NULL;
		count = 0;
	}
	else {
		current = rhs.first; //value of first node is copied
		count = rhs.count; //value of count is copied
		first = new node<Type>; //first created as new node
		first->info = current->info; //value of current info assigned to first->info
		first->link = NULL; //pointer field of first set to null
		last = first;
		current = current->link; //current set to next value in list
		while (current != NULL) {
			newNode = new node<Type>; //newNode created for storage
			newNode->info = current->info; //info in current stored in newNode
			newNode->link = NULL; //pointer in newNode set to null
			last->link = newNode; //link in previous node now points to newNode
			last = newNode; //last is now equal to newNode, last->link = NULL;
			current = current->link; //current has value of next node
		}
		/*although we need the pointer in current to traverse the linked list, to avoid a shallow copy, new memory
		addresses should be formed. newNode is needed for this purpose
		*/
	}
}

template <typename Type> bool linkedListType<Type>::isEmptyList() const {
	return (first == NULL);
}

template <typename Type> linkedListType<Type>::linkedListType() {
	first = NULL;
	last = NULL;
	count = 0;
}

template <typename Type> linkedListType<Type>::~linkedListType() {
	destroyList();
}

template <typename Type> linkedListType<Type>::linkedListType(const linkedListType<Type> &rhs) {
	first = NULL;
	copyList(rhs);
}

/*template <typename Type> bool linkedListType<Type>::operator!=(const linkedListType<Type> &rhs) const {
bool found = false;
node<Type> *current = first, *rhscurrent = rhs.first;
if ((current == NULL) && (rhscurrent == NULL)) {
return false;
}
else {
while ((current != NULL) && (rhscurrent != NULL)) {
if (current->info == rhscurrent->info) {
current = current->link;
rhscurrent = rhscurrent->link;
}
else {
return true;
}
}
if ((current == NULL) && (rhscurrent == NULL)) {
return false;
}
else {
return true;
}
}
}*/

template <typename Type> const linkedListType<Type>& linkedListType<Type>::operator=(const linkedListType<Type> &rhs) {
	copyList(rhs);

	return *this;
}

/*template <typename Type> bool linkedListType<Type>::operator==(const linkedListType<Type> &rhs) const {
bool output = true;
node<Type> *rhscurrent = rhs.first;
node<Type> *current = first;
while ((current != NULL) && (rhscurrent != NULL)) {
if (current->info != rhscurrent->info) {
output = false;
break;
}
else {
current = current->link;
rhscurrent = rhscurrent->link;
}
}
if ((current == NULL) && (rhscurrent == NULL) && (output == true)) {
return output;
}
else {
output = false;
return output;
}
}*/

template <typename Type>
void linkedListType<Type>::initializeList() {
	destroyList();
}

template <typename Type>
void linkedListType<Type>::print() const {
	node<Type> *current;
	current = first;
	if (current == NULL) {
		cout << "list is empty\n";
	}
	while (current != NULL) {
		cout << current->info << " ";
		current = current->link;
	}
}

template <typename Type> int linkedListType<Type>::length() const {
	return count;
}

template <typename Type> Type linkedListType<Type>::front() const {
	assert(first != NULL);
	return first->info;
}

template <typename Type> Type linkedListType<Type>::back() const {
	assert(last != NULL);
	return last->info;
}

template <typename Type> linkedListIterator<Type> linkedListType<Type>::begin() {
	linkedListIterator<Type> temp(first);
	return temp;
}

template <typename Type> linkedListIterator<Type> linkedListType<Type>::end() {
	linkedListIterator<Type> temp(NULL);
	return temp;
}

#endif