#include <iostream>

using namespace std;

int main()
{
    int *a=NULL, *b=NULL, *resultat;
    char choix;

    a= new int;
    b= new int;
    resultat= new int;


    cout << "Entrez une valeur pour a : ";
    cin >> *a;
    cout << "Entrez une valeur pour b : ";
    cin >> *b;


    do
    {
        cout << endl << "Addition : A" << endl;
        cout << "Soustraction : S" << endl;
        cout << "Multiplication : M" << endl;
        cout << "Division : D" << endl;
        cout << "Sortir du programme : Q" << endl;

        cout << endl << "Votre choix : ";
        cin >> choix;

    switch(choix)
    {
        case 'A' :
                *resultat=(*a)+(*b);
                cout << "Le resultat de l'addition : " << *resultat << endl;
                break;
        case 'S' :
                *resultat=(*a)-(*b);
                cout << "Le resultat de la soustraction : " << *resultat << endl;
                break;
        case 'M' :
                *resultat=(*a)*(*b);
                cout << "Le resultat de la multiplication : " << *resultat << endl;
                break;
        case 'D' :
                *resultat=(*a)/(*b);
                cout << "Le resultat de la division : " << *resultat;
                *resultat=(*a)%(*b);
                cout << " avec un reste de " << *resultat << endl;
                break;
        default :
                break;
    }

    }while(choix!='Q');

    delete a;
    delete b;
    delete resultat;

    return 0;
}
