import serial
ser = serial.Serial('/dev/arduino-input', 9600)
ser.write('info')
read_serial=ser.readline()
print read_serial
f = open('get_info.php', 'w')
'''print >> f, "<script>info_var = %s</script>" %read_serial'''
print >> f, "<?php echo %s;?>" %read_serial
f.close()
