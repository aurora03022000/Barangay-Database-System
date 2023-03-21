using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using System.Text.RegularExpressions;
using MySql.Data.MySqlClient;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for menuPage.xaml
    /// </summary>
    ///
    public partial class menuPage : Window
    {
        bool isWindowOpen = false;
        bool isWindowOpenInput = false;
        bool isWindowOpenManageAccount = false;
        bool isWindowOpenRegisterAccount = false;
        bool isWindowOpenEditAccount = false;
        bool isWindowOpenChangePassword = false;

        String username, accountID;

        public menuPage()
        {
            InitializeComponent();

            
        }

        private void Logout_btn_Click(object sender, RoutedEventArgs e)
        {
            loginPage loginPageWindow = new loginPage();
            loginPageWindow.Show();
            this.Close();
        }


        private void enter_data_btn_Click(object sender, RoutedEventArgs e)
        {
            foreach(Window enterDataWindow in Application.Current.Windows)
            {
                if(enterDataWindow is enterDataPage)
                {
                    isWindowOpen = true;
                    enterDataWindow.Activate();
                }
            }

            if (!isWindowOpen)
            {
                
                enterDataPage enterDataPageWindow = new enterDataPage();
                enterDataPageWindow.Show();
            }

            else if(isWindowOpen == true)
            {
                isWindowOpen = false;
            }
        }


        private void Transaction_btn_Click(object sender, RoutedEventArgs e)
        {
            homeGrid.Visibility = Visibility.Hidden;
            transactionGrid.Visibility = Visibility.Visible;
            reportsGrid.Visibility = Visibility.Hidden;
            accountGrid.Visibility = Visibility.Hidden;
           smsGrid.Visibility = Visibility.Hidden;
        }

        private void search_data_btn_Click(object sender, RoutedEventArgs e)
        {
            
            foreach (Window searchDataWindow in Application.Current.Windows)
            {
                if (searchDataWindow is searchDataPage1)
                {
                    isWindowOpen = true;
                    searchDataWindow.Activate();
                }
            }

            if (!isWindowOpen)
            {
                searchDataPage1 searchDataPageWindow = new searchDataPage1();
                searchDataPageWindow.Show();
            }

            else if (isWindowOpen == true)
            {
                isWindowOpen = false;
            }
        }

        private void Settings_page_btn_Click(object sender, RoutedEventArgs e)
        {
            foreach (Window inputPageModificationWindow in Application.Current.Windows)
            {
                if (inputPageModificationWindow is inputsPageModification)
                {
                    isWindowOpenInput = true;
                    inputPageModificationWindow.Activate();
                }
            }

            if (!isWindowOpenInput)
            {
                inputsPageModification inputPageModificationWindow = new inputsPageModification();
                inputPageModificationWindow.Show();
            }

            else if (isWindowOpenInput == true)
            {
                isWindowOpenInput = false;
            }
        }

        private void settings_Click(object sender, RoutedEventArgs e)
        {
            homeGrid.Visibility = Visibility.Hidden;
            transactionGrid.Visibility = Visibility.Hidden;
            reportsGrid.Visibility = Visibility.Visible;
            accountGrid.Visibility = Visibility.Hidden;
            smsGrid.Visibility = Visibility.Hidden;
        }

        private void Account_btn_Click(object sender, RoutedEventArgs e)
        {
            homeGrid.Visibility = Visibility.Hidden;
            transactionGrid.Visibility = Visibility.Hidden;
            reportsGrid.Visibility = Visibility.Hidden;
            accountGrid.Visibility = Visibility.Visible;
            smsGrid.Visibility = Visibility.Hidden;
        }

        private void Manage_account_btn_Click(object sender, RoutedEventArgs e)
        {
            foreach (Window manageAccountsWindow in Application.Current.Windows)
            {
                if (manageAccountsWindow is manageAccountPage)
                {
                    isWindowOpenManageAccount = true;
                    manageAccountsWindow.Activate();
                }
            }

            if (!isWindowOpenManageAccount)
            {
                manageAccountPage manageAccountsWindow = new manageAccountPage();
                manageAccountsWindow.Show();
            }

            else if (isWindowOpenManageAccount == true)
            {
                isWindowOpenManageAccount = false;
            }
        }

        private void Register_account_btn_Click(object sender, RoutedEventArgs e)
        {
            foreach (Window registerAccountsWindow in Application.Current.Windows)
            {
                if (registerAccountsWindow is registerAccountPage)
                {
                    isWindowOpenRegisterAccount = true;
                    registerAccountsWindow.Activate();
                }
            }

            if (!isWindowOpenRegisterAccount)
            {
                registerAccountPage registerAccountsWindow = new registerAccountPage();
                registerAccountsWindow.Show();
            }

            else if (isWindowOpenRegisterAccount == true)
            {
                isWindowOpenRegisterAccount = false;
            }
        }

        private void Account_details_btn_Click(object sender, RoutedEventArgs e)
        {
            foreach (Window editAccountsWindow in Application.Current.Windows)
            {
                if (editAccountsWindow is viewAccountPage1)
                {
                    isWindowOpenEditAccount = true;
                    editAccountsWindow.Activate();
                }
            }

            if (!isWindowOpenEditAccount)
            {
                viewAccountPage1 editAccountsWindow = new viewAccountPage1();
                editAccountsWindow.Show();
            }

            else if (isWindowOpenEditAccount == true)
            {
                isWindowOpenEditAccount = false;
            }
        }

        private void sms_btn_Click(object sender, RoutedEventArgs e)
        {
            homeGrid.Visibility = Visibility.Hidden;
            transactionGrid.Visibility = Visibility.Hidden;
            reportsGrid.Visibility = Visibility.Hidden;
            accountGrid.Visibility = Visibility.Hidden;
            smsGrid.Visibility = Visibility.Visible;
        }

        private void Home_btn1_Click(object sender, RoutedEventArgs e)
        {
            homeGrid.Visibility = Visibility.Visible;
            transactionGrid.Visibility = Visibility.Hidden;
            reportsGrid.Visibility = Visibility.Hidden;
            accountGrid.Visibility = Visibility.Hidden;
            smsGrid.Visibility = Visibility.Hidden;
        }

        private void Sync_data_btn_Click(object sender, RoutedEventArgs e)
        {
            MessageBox.Show("Coming Soon!");
        }

        private void Change_password_btn_Click(object sender, RoutedEventArgs e)
        {
            foreach (Window changePasswordWindow in Application.Current.Windows)
            {
                if (changePasswordWindow is changePasswordPage1)
                {
                    isWindowOpenChangePassword = true;
                    changePasswordWindow.Activate();
                }
            }

            if (!isWindowOpenChangePassword)
            {
                changePasswordPage1 changePasswordWindow = new changePasswordPage1();
                changePasswordWindow.Show();
            }

            else if (isWindowOpenChangePassword == true)
            {
                isWindowOpenChangePassword = false;
            }
        }
    }
}