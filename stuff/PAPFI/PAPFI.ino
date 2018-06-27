/*
 * Complete Project Details http://randomnerdtutorials.com
 */

// Include Software Serial library to communicate with GSM
#include <SoftwareSerial.h>

#include <Servo.h>

#include <Arduino.h>

char junk;
String inputString="";


Servo servo;
int angle = 10;



// Configure software serial port
SoftwareSerial SIM900(7, 8);

// Variable to store text message
String textMessage;

// Create a variable to store Lamp state
String lampState = "HIGH";

// Relay connected to pin 12
const int relay = 12;


void setup() {



  pinMode(5,OUTPUT);

   servo.attach(4);
 servo.write(angle);
  // Automatically turn on the shield
 
  
  // Set relay as OUTPUT
  pinMode(relay, OUTPUT);

  // By default the relay is off
  digitalWrite(relay, HIGH);
  
  // Initializing serial commmunication
  Serial.begin(9600); 
  SIM900.begin(9600);

  // Give time to your GSM shield log on to network
  delay(2000);
  Serial.print("SIM900 ready...");

  // AT command to set SIM900 to SMS mode
  SIM900.print("AT+CMGF=1\r"); 
  delay(100);
  // Set module to send SMS data to serial out upon receipt 
  SIM900.print("AT+CNMI=2,2,0,0,0\r");
  delay(100);

  SIM900.print("AT+IPR=9600\r");      
   SIM900.print("AT+CMGD=1,4");
}

void loop(){

  if(SIM900.available()>0){
    textMessage = SIM900.readString();
    Serial.print(textMessage);    
    delay(10);
  } 
  if(textMessage.indexOf("ON")>=0){
      SIM900.print("AT+CMGD=1,4");
    // Turn on relay and save current state
    
   digitalWrite(5,HIGH);
    lampState = "on";
    Serial.println("Relay set to ON");  
    textMessage = "";   
  }
  if(textMessage.indexOf("OFF")>=0){
      SIM900.print("AT+CMGD=1,4");
    // Turn off relay and save current state
  digitalWrite(5,LOW);
    lampState = "off"; 
    Serial.println("Relay set to OFF");
    textMessage = ""; 
  }
  if(textMessage.indexOf("STATE")>=0){
      SIM900.print("AT+CMGD=1,4");
    String message = "Lamp is " + lampState;
    sendSMS(message);
    Serial.println("Lamp state resquest");
    textMessage = "";
  }

  if(Serial.available()){
  while(Serial.available())
    {
      char inChar = Serial.read(); //read the input
      inputString += inChar;        //make a string of the characters coming on serial
    }
  
    Serial.println(inputString);
   
    if( inputString == "a"){         //in case of 'a' turn the LED on
    digitalWrite(5,HIGH);
      delay(100);
    }else if( inputString == "b"){   //incase of 'b' turn the LED off
         digitalWrite(5,LOW);
  delay(100);
    }
    inputString = "";
  }
  
}  

// Function that sends SMS
void sendSMS(String message){
  // AT command to set SIM900 to SMS mode
  SIM900.print("AT+CMGF=1\r"); 
  delay(100);

  // REPLACE THE X's WITH THE RECIPIENT'S MOBILE NUMBER
  // USE INTERNATIONAL FORMAT CODE FOR MOBILE NUMBERS
  SIM900.println("AT + CMGS = \"+351918576911\""); 
  delay(100);
  // Send the SMS
  SIM900.println(message); 
  delay(100);

  // End AT command with a ^Z, ASCII code 26
  SIM900.println((char)26); 
  delay(100);
  SIM900.println();
  // Give module time to send SMS
  delay(5000);  
}
