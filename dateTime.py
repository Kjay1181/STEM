# Use the datetime object to create and manipulate date and time
#resource: https://www.guru99.com/date-time-and-datetime-classes-in-python.html
#Import modules needed from dateTime
#datetime is the library
#use as to rename sommething

from datetime import time 
from datetime import date
from datetime import datetime

#create  a main loop so this module can be imported 
def main():

	#create a new date time object that holds the current datetime
	currentTime = datetime.now()
	
	print(type(currentTime))
	
	#print only the time from the datetime object
	print (datetime.time(currentTime))

#Use strftime to print only the year from the datetime object
	print("Current Year: ", currentTime.strftime("%Y"))
	
	#use strftime to print a very human readable data
	print("Current Date: ", currentTime.strftime("%a,%B %d, %Y"))












if __name__ == "__main__":
	main()
