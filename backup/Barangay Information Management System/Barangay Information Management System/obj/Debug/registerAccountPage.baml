   M S B A M L   `   `   `  ����a  ]Barangay Information Management System, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null_4clr-namespace:Barangay_Information_Management_System&Barangay_Information_Management_System  5   	   @    :Barangay_Information_Management_System.registerAccountPage   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   Flocal4clr-namespace:Barangay_Information_Management_System     5   	     � Title$  registerAccountPage��5   	   $��679.223��6%   $��1001.316��66    � 
ResizeMode$ NoResize=�6G    � WindowStartupLocation$ CenterScreen=�6]   .��5	      � .+�5
   
   �  � RowDefinitions 5      �� 5      $��75 �6    6.   �� 5      .+�5      � $��0��6   $��Center=�6    $��75��6;   ���#189DEC$��0,0,0,3q�6\   .+�5      �� $��Register Account��6   $��21(�63   $��Tahoma)�6A   $��
10,0,10,10q�6U   $��Center=�6i   $��Center=�6�   $��Bottom=�6�   $��55��6�   
�������$
��Bold"�6�   5      � 5      $��1��6   .+�5      �� $��*��6   $��15(�6$   
���  ��$	��Top=�6C   $
��Left=�6[   $��
242,42,0,0q�6v   $��25��6�   6�   �� 5      $��
Account : ��6   $��Tahoma)�6-   $��15(�6A   $
��Left=�6O   $	��Top=�6j   $��	95,70,0,0q�6�   $
��Bold"�6�   6�   �� 5      $��Username��6   $��Tahoma)�6+   $��Italic$�6?   $
��Left=�6R   $	��Top=�6m   $��
185,46,0,0q�6�   6�   �� 5      $��Password��6   $��Tahoma)�6+   $��Italic$�6?   $
��Left=�6R   $	��Top=�6m   $��
436,46,0,0q�6�   6�   �� 5      -   5         ��Name$ username_textbox��5      $y�Visible=�64   
�������$	��Top=�6`   $
��Left=�6x   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   4  .System.Windows.Automation.AutomationProperties   Name$ username_textbox��6�   $��
185,70,0,0q�6�   G� 5      -   5         G�Name$ password_textbox��5      $y�Visible=�68   
�������$	��Top=�6d   $
��Left=�6|   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   $ username_textbox��6�   $��
436,70,0,0q�6  �� 5      $��Name : ��6   $��Tahoma)�6*   $��15(�6>   $
��Left=�6L   $	��Top=�6g   $��112,149,0,0q�6   $
��Bold"�6�   6�   �� 5      $��
First Name��6   $��Tahoma)�6-   $��Italic$�6A   $
��Left=�6T   $	��Top=�6o   $��185,125,0,0q�6�   6�   �� 5      $��Middle Name��6   $��Tahoma)�6.   $��Italic$�6B   $
��Left=�6U   $	��Top=�6p   $��436,125,0,0q�6�   6�   �� 5      $��	Last Name��6   $��Tahoma)�6,   $��Italic$�6@   $
��Left=�6S   $	��Top=�6n   $��687,125,0,0q�6�   6�   �� 5      -   5        $ first_name_textbox��5      $y�Visible=�66   
�������$	��Top=�6b   $
��Left=�6z   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   $ first_name_textbox��6�   $��185,149,0,0q�6  �� 5       -   5        $ middle_name_textbox��5       $y�Visible=�67   
�������$	��Top=�6c   $
��Left=�6{   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   $ middle_name_textbox��6�   $��436,149,0,0q�6  �� 5!      -   5        $ last_name_textbox��5!      $y�Visible=�65   
�������$	��Top=�6a   $
��Left=�6y   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   $ last_name_textbox��6�   $��687,149,0,0q�6   �� 5"      $��
Address : ��6   $��Tahoma)�6-   $��15(�6A   $
��Left=�6O   $	��Top=�6j   $��
95,227,0,0q�6�   $
��Bold"�6�   6�   �� 5#      $��Barangay��6   $��Tahoma)�6+   $��Italic$�6?   $
��Left=�6R   $	��Top=�6m   $��185,203,0,0q�6�   6�   �� 5$      -   5         ��Name$ requiredPurok��5$   ,   $y�Hidden=�6   $��*��6C   $��15(�6O   
���  ��$	��Top=�6n   $
��Left=�6�   $��23��6�   $��20��6�   $��471,180,0,0q�6�   $ requiredPurok��6�   6�   �� 5%      $��Purok��6   $��Tahoma)�6(   $��Italic$�6<   $
��Left=�6O   $	��Top=�6j   $��436,203,0,0q�6�   6�   �� 5&      -   5        $ barangay_textbox��5&   ,    �� 
IsReadOnly . $y�Visible=�6F   
�������$	��Top=�6r   $
��Left=�6�   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   $ barangay_textbox��6�   $��185,227,0,0q�6  $��
Santa Cruz��6%  �� 5'      -   5        $ purok_textbox��5'      $y�Visible=�61   
�������$	��Top=�6]   $
��Left=�6u   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   $ purok_textbox��6�   $��436,227,0,0q�6�   �� 5(      $��Number :��6   $��Tahoma)�6+   $��15(�6?   $
��Left=�6M   $	��Top=�6h   $��
94,309,0,0q�6�   $
��Bold"�6�   $��85��6�   6�   �� 5)      -	   5        $ phone_number_textbox��5)   <   $y�Visible=�6Z   
�������$	��Top=�6�   $
��Left=�6�   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   $ phone_number_textbox��6�   $��185,309,0,0q�6(  �� 5*      -
   5        	 ��Name$	 register_account_btn��5*      $y�Visible=�67   $
��Left=�6L   
 � Cursor$

 Hand��6g   $ register_account_btn��6u   ���	#FF47C144
�������$	��Top=�6�   $��185,393,0,0q�6�   $��34��6�   $	��133��6	  .��5+      ]� .+�5,      �� -   5         ��Name$ registerImageAccount��5,       $��img/Register Icon.png��6?   $��23��6^   $��26��6j   $��0,0,5,0q�6u   $ editImageAccount��6�   �� 5-      -   5         ��Name$ registerAccountTextBlock��5-   $   $��Register��6F   $
��Bold"�6W   $��Center=�6i   $ editAccountTextBlock��6�   6�   5.      5/      �� 50      $��Note:��6   $��Italic$�6(   $
��Bold"�6;   $��37��6M   $	��Top=�6Y   $��156,492,0,0q�6q   $
��Left=�6�   $��40��6�   �� 51      -   5        $ fourpsReportContent��51      $����Only admin can register new user account because admin have the controls and admin have the only authority to manage all acounts��65   $��196,492,0,0q�6�   $��Italic$�6�   $��37��6�   $	��Top=�6�   $ fourpsReportContent��6  $
��Auto=�6<  $
��Auto=�6n  $
��Left=�6�  �� 52      $��Phone Number��6   $��Tahoma)�6/   $��Italic$�6C   $
��Left=�6V   $	��Top=�6q   $��185,285,0,0q�6�   �� 53      $��*��6   $��15(�6$   
���  ��$	��Top=�6C   $
��Left=�6[   $��
491,37,0,0q�6v   $��25��6�   �� 54      $��*��6   $��15(�6$   
���  ��$	��Top=�6C   $
��Left=�6[   $��471,197,0,0q�6v   $��25��6�   56      57      58      59      