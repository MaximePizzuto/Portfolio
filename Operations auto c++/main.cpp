#include <iostream>
#include <cmath>

using namespace std;

typedef struct
{
    int a,b;
    void setValeurs(int val1, int val2);        // initialisation des valeurs pour a=val1 et b=val2
    void getValeurs();                          // affichage de a et b sur la console
    int addition();                             // valeur de retour : a+b
    int soustraction();                         // valeur de retour : a-b
    int puissance(int n);                      // valeur de retour : a puissance n
}coupleNombres;



int main()
{
    coupleNombres maVariable;
    int tempA, tempB, tempN;

// acquisition des valeurs pour tempA et tempB
    cout << "Valeur pour tempA : ";
    cin >> tempA;
    cout << "Valeur pour tempB : ";
    cin >> tempB;
    cout << "Valeur pour tempN : ";
    cin >> tempN;
    cout << endl;

// traitement
    maVariable.setValeurs(tempA,tempB);     // initialisation des données membres a et b de la structure
    maVariable.getValeurs();                // affichage des données membres de la structure
    cout << "Addition : " << maVariable.addition() << endl;
    cout << "Soustraction : " << maVariable.soustraction() << endl;
    cout << "Puissance : " << maVariable.puissance(tempN) << endl;

    cout << endl << "Appuyez sur une touche pour quitter le programme...";
    cin.ignore();
    cin.get();

    return 0;
}

void coupleNombres::setValeurs(int val1, int val2)
{
  a=val1;
  b=val2;
}

void coupleNombres::getValeurs()
{
    cout << "Valeur de a : " << a << endl;
    cout << "Valeur de b : " << b << endl;

}

int coupleNombres::addition()
{
    return a+b;
}

int coupleNombres::soustraction()
{
    return a-b;
}

int coupleNombres::puissance(int n)
{

    int temp1=0, temp2=0;
    double temp3=0;

    temp1=a;
    temp2=n;
    temp3=pow(temp1,temp2);     // le résultat de pow() doit etre un double sinon si on déclare un int, on peut avoir 10puissance2 = 99!!!
    return (int)temp3;
}
