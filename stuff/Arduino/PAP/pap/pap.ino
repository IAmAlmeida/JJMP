/* instalar AccelStepper biblioteca*/

/*-----( Import needed libraries )-----*/
#include <Stepper.h>

/*-----( Declare Constants, Pin Numbers )-----*/
//---( Number of steps per revolution of INTERNAL motor in 4-step mode )---
#define STEPS_PER_MOTOR_REVOLUTION 32   

//---( Steps per OUTPUT SHAFT of gear reduction )---
#define STEPS_PER_OUTPUT_REVOLUTION 32 * 64  //2048  

/*-----( Declare objects )-----*/
// create an instance of the stepper class, specifying
// the number of steps of the motor and the pins it's
// attached to

//The pin connections need to be pins 8,9,10,11 connected
// to Motor Driver In1, In2, In3, In4 

// Then the pins are entered here in the sequence 1-3-2-4 for proper sequencing
Stepper small_stepper(STEPS_PER_MOTOR_REVOLUTION, 8, 10, 9, 11);


/*-----( Declare Variables )-----*/
int  Steps2Take;

void setup()
{
// Nothing  (Stepper Library sets pins as outputs)
}

void loop()
{ 
  Steps2Take  =  - STEPS_PER_OUTPUT_REVOLUTION / 4;  // imaginem uma roda, o 4 p.e é o numero que divide essa roda
  digitalWrite(Steps2Take);
  small_stepper.setSpeed(700) // aqui é o speed. o maximo é 700, dps parece que fica com trissomia
  small_stepper.step(Steps2Take);
  delay(2000);

}

