   M S B A M L   `   `   `  ����Y  UBarangay CCT Management System, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullO,clr-namespace:Barangay_CCT_Management_SystemBarangay_CCT_Management_System  5   	   -    'Barangay_CCT_Management_System.menuPage   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   >local,clr-namespace:Barangay_CCT_Management_System     5   	     � Title$  menuPage��5   
   $	��837��6   $
��1424��6(   
������� � Icon$ img\Icon.ico��6H    � WindowStartupLocation$ CenterScreen=�6\    � WindowState$ 	Maximized=�6�   $	��874��6�   $	��527��6�   .��5	      �  � RowDefinitions 5
   
   �� 5      $��97 �6   6*   �� 5      .+�5   
   � $��1��6    � ColumnDefinitions 5      �� 5      $	��195 �6#   61   �� 5      .+�5      � ���#189DEC$��0��6(    5      �� 5      $��63 �6$   62   �� 5      $��59 �6$   62   �� 5      $��59 �6$   62   �� 5      $��59 �6$   62   �� 5      $��59 �6$   62   �� 5      �� 5       $��59 �6$   62   .+�5#      �� $��0��6   $��20(�6%   $��Tahome)�63   
�������$
��Menu��6Z   $��Center=�6i   $��Center=�6�   $
��Bold"�6�   $��46��6�   $��	41,8,42,9q�6�   $��92��6�   $��Center=�6�   $��Center=�6  �� 5%      $��1��6    � Cursor$
 Hand��6&   $
��Left=�64   $��0q�6V   $��10,1,1,1q�6a   
���   �$��1q�6�   .��5&      ]� .+�5'      �� $��img/Card.png��6    $��30��66   $��29��6B   �� 5(      $��Generate CCTS Card��6$   $��15(�6>   $��Tahoma)�6L   $��Center=�6`   $��Center=�6{   $��10,0,0,0q�6�   6�   5)      5*      �� 5+      $��2��6   $
 Hand��6&   $
��Left=�64   $��10,1,1,1q�6V   
���   �$��1q�6}   .��5,      ]� .+�5-      �� $��img/Travel History.png��6    $��30��6@   $��29��6L   �� 5.      $��Travel History��6$   $��15(�6:   $��Tahoma)�6H   $��Center=�6\   $��Center=�6w   $��10,0,0,0q�6�   6�   5/      50      �� 51      $��3��6   $
 Hand��6&   $
��Left=�64   $��10,1,1,1q�6V   
���   �$��1q�6}   .��52      ]� .+�53      �� $��img/Report.png��6    $��30��68   $��29��6D   �� 54      $��Reports��6$   $��15(�63   $��Tahoma)�6A   $��Center=�6U   $��Center=�6r   $	��115��6�   $��10,0,0,0q�6�   $��22��6�   6�   55      56      �� 57      $��4��6   $
 Hand��6&   $
��Left=�64   $��10,1,1,1q�6V   
���   �$��1q�6}   .��58      ]� .+�59      �� $��img/Settings.png��6    $��30��6:   $��29��6F   �� 5:      $��Account Settings��6$   $��15(�6<   $��Tahoma)�6J   $��Center=�6^   $��Center=�6{   $	��115��6�   $��10,0,0,0q�6�   $��22��6�   6�   5;      5<      �� 5=      -   5         ��Name$ 
logout_btn��5=      $��6��6-   $
 Hand��6:   $
��Left=�6H   $��10,1,1,1q�6j   
���   �$��1q�6�   4  .System.Windows.Automation.AutomationProperties   Name$ 
logout_btn��6�   .��5>      ]� .+�5?      �� $��img/Logout.png��6    $��30��68   $��29��6D   �� 5@      $��Logout��6$   $��15(�62   $��Tahoma)�6@   $��Center=�6T   $��Center=�6q   $	��115��6�   $��10,0,0,0q�6�   $��22��6�   6�   5A      5B      5C      � 5G      $��1��6   5J      �� 5N   
   $��0��6   	 J� Effect	 5O      3  -System.Windows.Media.Effects.DropShadowEffect  5P      
   
BlurRadius$
 50Q�6#      Color$ Black��63      Opacity$	 100Q�6A      ShadowDepth$ 0Q�6O      	Direction$	 -40Q�6_   ._�5S      � ���#0E73D9.+�5T      ��  �� Orientation$ 
Horizontal=�6   $��Center=�66   $��Center=�6S   .+�5U      �� $��img/Banner.png��6   $
��Left=�64   $��85��6O   $��Center=�6Z   $
��Fill=�6u   $��80��6�   �� 5V      -   5         ��Name$ 
titleLabel��5V      $6��0Barangay Covid Contact Tracing Management System��60   $��20(�6k   
�������$��Tahoma)�6�   $ 
titleLabel��5W      $	��550��6@    J� RenderTransformOrigin$ 0.5,0.5&�6L   $��Center=�6l   $
��Bold"�6�   5X      5Y      5[      5^      5_      