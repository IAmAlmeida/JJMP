#include <Servo.h>

#include <Arduino.h>

char junk;
String inputString="";


Servo servo;
int angle = 10;

void setup()                    // run once, when the sketch starts
{
 servo.attach(8);
 servo.write(angle);
 Serial.begin(9600);            // set the baud rate to 9600, same should be of your Serial Monitor

}

void loop()
{
 if(Serial.available()){
  while(Serial.available())
    {
      char inChar = Serial.read(); //read the input
      inputString += inChar;        //make a string of the characters coming on serial
    }
  
    Serial.println(inputString);
   
    if( inputString == "a"){         //in case of 'a' turn the LED on
  for(angle = 10; angle < 90; angle++)  
  {                                  
    servo.write(angle);               
    delay(15);                   
  } 
      delay(100);
    }else if( inputString == "b"){   //incase of 'b' turn the LED off
       for(angle = 90; angle > 10; angle--)    
  {                                
    servo.write(angle);           
    delay(15);       
  } 
  delay(100);
    }
    inputString = "";
  }
}
