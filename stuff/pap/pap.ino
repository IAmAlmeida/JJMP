#ifndef Stepper_h
#define Stepper_h

class StepperMotor {
public:
    StepperMotor(int In1, int In2, int In3, int In4);    // Constructor that will set the inputs
    void setStepDuration(int duration);    // Function used to set the step duration in ms
    void step(int noOfSteps);    // Step a certain number of steps. + for one way and - for the other

    int duration;    // Step duration in ms
    int inputPins[4];    // The input pin numbers
};

#endif




#include <Arduino.h>
#include <StepperMotor.h>
#include <dht.h>

dht DHT;

#define DHT11_PIN 7

StepperMotor::StepperMotor(int In1, int In2, int In3, int In4){
    // Record pin numbers in the inputPins array
    this->inputPins[0] = In1;
    this->inputPins[1] = In2;
    this->inputPins[2] = In3;
    this->inputPins[3] = In4;

    // Iterate through the inputPins array, setting each one to output mode
    for(int inputCount = 0; inputCount < 4; inputCount++){
        pinMode(this->inputPins[inputCount], OUTPUT);
    }
    duration = 50;
}

void StepperMotor::setStepDuration(int duration){
    this->duration = duration;
}

void StepperMotor::step(int noOfSteps){
    /*
        The following 2D array represents the sequence that must be
        used to acheive rotation. The rows correspond to each step, and
        the columns correspond to each input. L
    */
    bool sequence[][4] = {{LOW, LOW, LOW, HIGH },
                          {LOW, LOW, HIGH, HIGH},
                          {LOW, LOW, HIGH, LOW },
                          {LOW, HIGH, HIGH, LOW},
                          {LOW, HIGH, LOW, LOW },
                          {HIGH, HIGH, LOW, LOW},
                          {HIGH, LOW, LOW, LOW },
                          {HIGH, LOW, LOW, HIGH}};
                      
    int factor = abs(noOfSteps) / noOfSteps;    // If noOfSteps is +, factor = 1. If noOfSteps is -, factor = -1 
    noOfSteps = abs(noOfSteps);    // If noOfSteps was in fact negative, make positive for future operations

    /* 
        The following algorithm runs through the sequence the specified number 
        of times
    */
    for(int sequenceNum = 0;  sequenceNum <= noOfSteps/8; sequenceNum++){
        for(int position = 0; ( position < 8 ) && ( position < ( noOfSteps - sequenceNum*8 )); position++){
            delay(duration);
            for(int inputCount = 0; inputCount < 4; inputCount++){
                digitalWrite(this->inputPins[inputCount], sequence[(int)(3.5 - (3.5*factor) + (factor*position))][inputCount]);
            }
        } 
    }
}



#include <StepperMotor.h>

StepperMotor motor(8,9,10,11);


char junk;
String inputString="";

void setup()                    // run once, when the sketch starts
{
 Serial.begin(9600);            // set the baud rate to 9600, same should be of your Serial Monitor
 pinMode(13, OUTPUT);
   motor.setStepDuration(1);
}

void loop()
{

 int chk = DHT.read11(DHT11_PIN);


/*Serial.print("Temp: ");
Serial.print(DHT.temperature);
Serial.print("   ");
Serial.print("Humidity: ");
Serial.print(DHT.humidity);
 delay(1500);*/

  if(Serial.available()){
  while(Serial.available())
    {
      char inChar = Serial.read(); //read the input
      inputString += inChar;        //make a string of the characters coming on serial

   
      
    }
  
    Serial.println(inputString);
   
    if( inputString == "a"){         //in case of 'a' turn the LED on
      motor.step(1000);
      delay(100);
    }else if( inputString == "t"){   //incase of 'b' turn the LED off
     
    }
    inputString = "";
  
}
         Serial.print("Temperatura:");
        Serial.print(DHT.temperature);
        Serial.print(" | Humidade: ");
        Serial.print(DHT.humidity);
          Serial.print(" ");
     delay(1500);
   
    
}
