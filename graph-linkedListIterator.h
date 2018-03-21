#ifndef LINKEDLISTITERATOR_H
#define LINKEDLISTITERATOR_H

template <typename Type>
struct node {
	Type info;
	node<Type> *link;
};

//goes through 
template <typename Type>
class linkedListIterator {
	node<Type> *current;
public:
	linkedListIterator(); //default constructor
	linkedListIterator(node<Type>*); //constructor with parameters
	Type operator*(); //dereference operator
	linkedListIterator<Type> operator++(); //increment operator
	bool operator==(const linkedListIterator<Type>&) const;
	bool operator!=(const linkedListIterator<Type>&) const;
};

template <typename Type>
linkedListIterator<Type>::linkedListIterator() {
	current = NULL;
}

template <typename Type>
linkedListIterator<Type>::linkedListIterator(node<Type> * ptr) {
	current = ptr;
}

template <typename Type>
Type linkedListIterator<Type>::operator *() {
	return current->info;
}

template <typename Type>
linkedListIterator<Type> linkedListIterator<Type>::operator++() {
	current = current->link;
	return *this;
}

template <typename Type>
bool linkedListIterator<Type>::operator==(const linkedListIterator<Type>& rhs) const {
	return (current == rhs.current);
}

template <typename Type>
bool linkedListIterator<Type>::operator!=(const linkedListIterator<Type>& rhs) const {
	return (current != rhs.current);
}
#endif
