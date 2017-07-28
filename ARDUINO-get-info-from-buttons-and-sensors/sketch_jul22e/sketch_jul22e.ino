int ledPin = 13; // LED connected to digital pin 13
int inPin1 = 2;   
int inPin2 = 3;
int inPin3 = 4;
int inPin4 = 5;
int inPin5 = 6;
int inPin6 = 7;
int mainArray[6];
String command2 ;
int global_loop =0;

void setup() {
  // put your setup code here, to run once:
Serial.begin(9600);     
  pinMode(ledPin, OUTPUT);      // sets the digital pin 13 as output
  pinMode(inPin1, INPUT);      // sets the digital pin 7 as input
  pinMode(inPin2, INPUT);
  pinMode(inPin3, INPUT);
  pinMode(inPin4, INPUT);
  pinMode(inPin5, INPUT);
  pinMode(inPin6, INPUT);
         //  setup serial

}

void loop() {
  // put your main code here, to run repeatedly:


  //Serial.println('ssssssssssssss');
  printArray(mainArray);
  for (int temp=0;;temp++)
  {
       if(Serial.available()) // only if i receve string from r pi inter the if
        {
          command2 = Serial.readString();   // get command from r pi      
          if(command2=="info")
          {
              printArray(mainArray);          
          }
        } 
    
  }

}



void printArray(int mainArray[])
{
global_loop++;
for(int lop=0;lop!=6;lop++)
{
  mainArray[lop]=0;
}
  mainArray[0] = digitalRead(inPin1);   // read the input pin
  mainArray[1] = digitalRead(inPin2);   // read the input pin
  mainArray[2] = digitalRead(inPin3);   // read the input pin
  mainArray[3] = digitalRead(inPin4);   // read the input pin
  mainArray[4] = digitalRead(inPin5);   // read the input pin
  mainArray[5] = digitalRead(inPin6);   // read the input pin


  
  Serial.print("start");
  Serial.print(mainArray[0]);
  Serial.print(mainArray[1]);
  Serial.print(mainArray[2]);
  Serial.print(mainArray[3]);
  Serial.print(mainArray[4]);
  Serial.print(mainArray[5]);
  Serial.print("end");
  Serial.print(global_loop);
  Serial.println();
}


