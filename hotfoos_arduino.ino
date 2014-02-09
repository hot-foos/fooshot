#include <Arduino.h>

const int blck = 1;
const int yllw = 0;
const int endTime = 2000;
int i = 0;
int blackIntens1 = 0;
int yellowIntens1 = 0;
int yellowDiff = 0;
int blackDiff = 0;
int YellowScore = 0;
int BlackScore = 0;


void setup(){
  Serial.begin(9600);

  int time = 0;
  long bTotal = 0;
  long yTotal = 0;

  Serial.println("Calibrating Please Wait");
  while (time <= endTime)
  {
    //read from light sensors
    blackIntens1 = analogRead(blck);
    yellowIntens1 = analogRead(yllw);

    //get highest value
    if( yellowIntens1 > yellowDiff)
    {
      yellowDiff = yellowIntens1;
    }
     //get highest value
    if(blackIntens1 > blackDiff)
    {
      blackDiff = blackIntens1; 
    }
    
    //add up all values from light sensor
    bTotal += blackIntens1;
    yTotal += yellowIntens1;
   
//   if(time % 10) {
//    Serial.println(blackIntens1);
//    Serial.println(yellowIntens1); 
//   }
//   
   
    time++;
    delay(10);
  }
  //get average light sensor reading
  blackIntens1 = bTotal/endTime;
  yellowIntens1 = yTotal/endTime;
  
  //get max difference to be used as error
  blackDiff = blackDiff - blackIntens1;
  yellowDiff = yellowDiff - yellowIntens1;

  Serial.println("Done Calibrating");
  Serial.print("Black: ");
  Serial.println(blackIntens1);
  Serial.println(blackDiff);
  Serial.print("Yellow: ");
  Serial.println(yellowIntens1);
  Serial.println(yellowDiff);
}

void loop(){

  int black, yellow;

  //read from light sensor
  black = analogRead(blck); // will be 0-1023
  yellow = analogRead(yllw);

  //check if input is darker than average plus error
  if (black > (blackIntens1 + blackDiff)){
    Serial.println("Goal Scored on black");
    Serial.println(black);
    //Serial.println("goal tracking");
    //i++;
    //Serial.println(i);
    BlackScore++;
    delay(5000);
  }
   //check if input is darker than average plus error
  else if (yellow > (yellowIntens1 + yellowDiff)){
    Serial.println("Goal Scored on yellow");
    Serial.println(yellow);
    //Serial.println("goal tracking");
    //i++;
    //Serial.println(i);
    YellowScore++;
    delay(5000);
  }
  
  Serial.println("Score Yello v Black ");
  Serial.print(YellowScore);
  Serial.print(" ");
  Serial.println(BlackScore);
  
  if(YellowScore >=5 || BlackScore >= 5)
  {
    Serial.println("Game Over! Good Game!");
  }

}


