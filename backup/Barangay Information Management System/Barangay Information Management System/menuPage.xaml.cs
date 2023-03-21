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
        bool isWindowOpenReport = false;
        bool isWindowOpenManageAccount = false;
        bool isWindowOpenRegisterAccount = false;
        bool isWindowOpenEditAccount = false;
        bool isWindowOpenChangePassword = false;

        String username, accountID;

        public menuPage()
        {
            InitializeComponent();

            //getting username of current Account
            SqlConnection getCurrentAccountIDConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getCurrentAccountIDConnection.Open();
            SqlCommand getCurrentAccountIDCMD = new SqlCommand();
            getCurrentAccountIDCMD.Connection = getCurrentAccountIDConnection;
            getCurrentAccountIDCMD.CommandText = "SELECT * FROM currentAccount WHERE id = 1";
            getCurrentAccountIDCMD.ExecuteNonQuery();

            SqlDataReader getCurrentAccountIDDR = getCurrentAccountIDCMD.ExecuteReader();
            while (getCurrentAccountIDDR.Read())
            {
                username = getCurrentAccountIDDR.GetValue(1).ToString();
            }
            getCurrentAccountIDDR.Close();
            getCurrentAccountIDConnection.Close();

            //getting info of current Account
            SqlConnection getCurrentAccountInfoConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getCurrentAccountInfoConnection.Open();
            SqlCommand getCurrentAccountInfoCMD = new SqlCommand();
            getCurrentAccountInfoCMD.Connection = getCurrentAccountInfoConnection;
            getCurrentAccountInfoCMD.CommandText = "SELECT * FROM accounts WHERE username = @username";
            getCurrentAccountInfoCMD.Parameters.AddWithValue("@username", username);
            getCurrentAccountInfoCMD.ExecuteNonQuery();

            SqlDataReader getCurrentAccountInfoDR = getCurrentAccountInfoCMD.ExecuteReader();
            while (getCurrentAccountInfoDR.Read())
            {
                accountID = getCurrentAccountInfoDR.GetValue(0).ToString();
                username = getCurrentAccountInfoDR.GetValue(1).ToString();
            }
            getCurrentAccountInfoDR.Close();
            getCurrentAccountIDConnection.Close();

            if(username == "admin")
            {
                manage_account_btn.Visibility = Visibility.Visible;
                register_account_btn.Visibility = Visibility.Visible;
                registerAccountLabel.Visibility = Visibility.Visible;
                manageAccountLabel.Visibility = Visibility.Visible;
                account_details_btn.Visibility = Visibility.Hidden;
                change_password_btn.Visibility = Visibility.Hidden;
                changePasswordLabel.Visibility = Visibility.Hidden;
                accountDetailsLabel.Visibility = Visibility.Hidden;
            }

            else
            {
                manage_account_btn.Visibility = Visibility.Hidden;
                register_account_btn.Visibility = Visibility.Hidden;
                registerAccountLabel.Visibility = Visibility.Hidden;
                manageAccountLabel.Visibility = Visibility.Hidden;
                account_details_btn.Visibility = Visibility.Visible;
                change_password_btn.Visibility = Visibility.Visible;
                changePasswordLabel.Visibility = Visibility.Visible;
                accountDetailsLabel.Visibility = Visibility.Visible;
            }
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
            transactionGrid.Visibility = Visibility.Visible;
            homeGrid.Visibility = Visibility.Hidden;
            reportsGrid.Visibility = Visibility.Hidden;
            accountGrid.Visibility = Visibility.Hidden;
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

        private void Reportst_btn_Click(object sender, RoutedEventArgs e)
        {
            foreach (Window reportWindow in Application.Current.Windows)
            {
                if (reportWindow is enterDataPage)
                {
                    isWindowOpenReport = true;
                    reportWindow.Activate();
                }
            }

            if (!isWindowOpenReport)
            {

                reportPage reportsPageWindow = new reportPage();
                reportsPageWindow.Show();
            }

            else if (isWindowOpenReport == true)
            {
                isWindowOpenReport = false;
            }
        }

        private void Button_Click(object sender, RoutedEventArgs e)
        {
            transactionGrid.Visibility = Visibility.Hidden;
            homeGrid.Visibility = Visibility.Hidden;
            reportsGrid.Visibility = Visibility.Visible;
            accountGrid.Visibility = Visibility.Hidden;
        }

        private void Account_btn_Click(object sender, RoutedEventArgs e)
        {
            transactionGrid.Visibility = Visibility.Hidden;
            homeGrid.Visibility = Visibility.Hidden;
            reportsGrid.Visibility = Visibility.Hidden;
            accountGrid.Visibility = Visibility.Visible;
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
