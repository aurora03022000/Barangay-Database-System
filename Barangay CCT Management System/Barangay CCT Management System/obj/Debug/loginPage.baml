   M S B A M L   `   `   `  ����Y  UBarangay CCT Management System, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullO,clr-namespace:Barangay_CCT_Management_SystemBarangay_CCT_Management_System  5   	   .    (Barangay_CCT_Management_System.loginPage   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   >local,clr-namespace:Barangay_CCT_Management_System     5   	     � Title$6  0Barangay Covid Contact Tracing Management System��5   	    � Icon$ img\Icon.ico��6B   $	��426��6V   $	��613��6c   ���#189DEC � 
ResizeMode$ NoResize=�6�    � WindowStartupLocation$ CenterScreen=�6�   .��5	      �  � RowDefinitions 5
   
   �� 5      $	��40* �6   6+   �� 5      $	��90* �6   6+   �� 5      $	��11* �6   6+   .+�5   
   � $��0��6    � ColumnDefinitions 5      �� 5      $	��25* �6#   61   �� 5      $
��213* �6#   62   �� 5      $
��217* �6#   62   �� 5      $	��25* �6#   61   .+�5      � $��1��6   $��2��6#   .+�5      �� $��img\Banner.png��6   $��15,20,429,10q�60    J� RenderTransformOrigin$ 0.5,0.5&�6F   $��Center=�6f   $��Center=�6�   $	��100��6�   $��83��6�   �� 5      $6��0Barangay Covid Contact Tracing Management System��6   $��17(�6S   
�������$��Center=�6t   $��Center=�6�   $��115,42,7,35q�6�   $��Tahoma)�6�   $��36��6�   $	��422��6�   5      5      � 5!   
   $��1��6   $��Center=�6   $��Center=�67   $	��250��6T   $
��0,10q�6a    5"      �� 5#      $
��113* �6    60   �� 5$      $	��12* �6    .+�5'      � $��0��6   .+�5(      �� $��Username��6   
�������$��Center=�6>   $��Center=�6Y   $��93,26,390,164q�6v   $��15(�6�   $��80��6�   $��36��6�   $��Tahoma)�6�   6�   �� 5)      -   5         ��Name$ usernameTextbox��5)      $��Center=�63   $��Center=�6N   $��36��6k   $��180,23,90,165q�6w   $	��293��6�   $��Tahoma)�6�   $��15(�6�   $��5,6,5,0q�6�   4  .System.Windows.Automation.AutomationProperties   Name$ usernameTextbox��6�   6�   G� 5*      -   5        	 G�Name$	 passwordTextbox��5*      $��Center=�67   $��180,65,90,125q�6T   $��Center=�6k   $	��293��6�   $��36��6�   $��17(�6�   $��5,5,5,0q�6�   $��Tahoma)�6�   $ passwordTextbox��6�   �� 5+      $��Password��6   
�������$��Center=�6>   $��Center=�6Y   $��15(�6v   $��80��6�   $��30��6�   $��93,71,390,125q�6�   $��Tahoma)�6�   6�   �� 5,      -   5        $��Center=�5,      $��Center=�64   
 � Cursor$

 Hand��6Q   $��40��6_   $��218,141,125,45q�6k   $	��220��6�   $��Tahoma)�6�   .��5-      ]� .+�5.      �� $��img/Login.png��6    $��26��67   $��24��6C   $��0,0,10,0q�6N   $��Center=�6`   $��Center=�6{   �� 5/      $��Log in��6$   $��Center=�62   $��17(�6M   $��Center=�6[   $��Tahoma)�6x   6�   50      51      �� 52      -   5         ��Name$ 
errorLabel��52      
���  ��$��14(�6=   $y�Hidden=�6K   $��Invalid Credentials��6_   $
��Left=�6}   $��180,101,0,0q�6�   $	��Top=�6�   $��Tahoma)�6�   $ 
errorLabel��6�   53      54      � 58   
   $��3��6   .+�59      �� $8��2All Rights Reserve 2022 @Naomi Enterprise Solution��6   
�������$��15(�6d   $��Tahome)�6r   $��Center=�6�   6�   5:      5=      5>      