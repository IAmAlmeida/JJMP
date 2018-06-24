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
      for(angle = 180; angle > 10; angle--)  
  {                                  
    servo.write(angle);               
    delay(15);                   
  } 
  delay(100);
    }
    inputString = "";
  }
